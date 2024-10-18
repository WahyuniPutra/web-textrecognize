<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Recognize</title>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tesseract.js/4.1.1/tesseract.min.js'></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 40px 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            margin-bottom: 40px;
            transition: all 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        h1 {
            text-align: center;
            color: #4a4a4a;
            margin-bottom: 30px;
            font-size: 2.8em;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .upload-section {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 15px;
        }

        #file-upload {
            display: none;
        }

        .custom-file-upload, button {
            background: #667eea;
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border: none;
            outline: none;
        }

        .custom-file-upload:hover, button:hover {
            background: #764ba2;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0,0,0,0.15);
        }

        .table {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .cell {
            flex: 1 1 300px;
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .cell:hover {
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
        }

        h2 {
            color: #4a4a4a;
            margin-bottom: 20px;
            font-size: 1.8em;
            font-weight: 600;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        #recognized-text {
            white-space: pre-wrap;
            word-wrap: break-word;
            max-height: 300px;
            overflow-y: auto;
            padding: 15px;
            background: #f8f8f8;
            border-radius: 10px;
            font-size: 0.95em;
            line-height: 1.6;
        }

        .loading {
            display: none;
            text-align: center;
            margin-top: 30px;
        }

        .loading::after {
            content: '';
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 4px solid #667eea;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        footer {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            text-align: center;
            transition: all 0.3s ease;
        }

        footer:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        footer p {
            margin: 8px 0;
            color: #4a4a4a;
            font-size: 0.95em;
        }

        footer p:last-child {
            margin-top: 15px;
            font-weight: 600;
            color: #667eea;
        }

        @media (max-width: 768px) {
            .container, footer {
                padding: 30px;
            }

            h1 {
                font-size: 2.2em;
            }

            .table {
                flex-direction: column;
            }

            .cell {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Text Recognize</h1>
        <div class="upload-section">
            <label for="file-upload" class="custom-file-upload">
                Choose File
            </label>
            <input type="file" id="file-upload" accept="image/*">
            <button onclick="processImage()">Recognize Text</button>
        </div>
        <div class="table">
            <div class="cell">
                <h2>Uploaded Photo</h2>
                <img id="uploaded-image" src="" alt="Uploaded Image">
            </div>
            <div class="cell">
                <h2>Recognized Text</h2>
                <p id="recognized-text">No text recognized yet.</p>
            </div>
        </div>
        <div class="loading" id="loading"></div>
    </div>

    <footer>
        <p>Atong Nazarius 223010503019</p>
        <p>Wahyuni Putra 223010503020</p>
        <p>Ryan Delon Pratama 223020503059</p>
        <p>Rifky Mustaqim Handoko 223010503028</p>
        <p>Ahmad Iqbal 223020503100</p>
        <p>&copy; 2024</p>
    </footer>

    <script src="index.js"></script>
</body>
</html>