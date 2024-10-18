const fileInput = document.getElementById('file-upload');
const customFileUpload = document.querySelector('.custom-file-upload');

customFileUpload.addEventListener('click', () => fileInput.click());

fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
        customFileUpload.textContent = fileInput.files[0].name;
    } else {
        customFileUpload.textContent = 'Choose File';
    }
});

async function processImage() {
    const file = fileInput.files[0];
    
    if (!file) {
        alert('Please select an image file.');
        return;
    }

    const loading = document.getElementById('loading');
    loading.style.display = 'block';

    const reader = new FileReader();
    reader.onload = async function(event) {
        const imageDataUrl = event.target.result;
        document.getElementById('uploaded-image').src = imageDataUrl;
        
        try {
            const result = await Tesseract.recognize(
                imageDataUrl,
                'eng',
                { logger: m => console.log(m) }
            );
            
            document.getElementById('recognized-text').innerText = result.data.text;
        } catch (error) {
            console.error('Error during text recognition:', error);
            document.getElementById('recognized-text').innerText = 'Error occurred during text recognition.';
        } finally {
            loading.style.display = 'none';
        }
    };
    
    reader.readAsDataURL(file);
}