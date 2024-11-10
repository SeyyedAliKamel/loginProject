<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ماشین حساب باینری</title>
    <style>
        *{
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
            text-align: right;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .calculator input[type="text"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .calculator select,
        .calculator button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            background: #007BFF;
            color: #fff;
        }
        .calculator button:hover {
            background: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .history {
            margin-top: 20px;
            text-align: left;
            font-size: 14px;
            color: #777;
        }
        .history-item {
            margin-bottom: 10px;
        }
        .toggle-format {
            font-size: 12px;
            margin-top: 10px;
            cursor: pointer;
            color: blue;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>ماشین حساب باینری</h1>
        <form onsubmit="calculate(event)">
            <input type="text" id="binary1" placeholder="عدد اول" required>
            <input type="text" id="binary2" placeholder="عدد دوم" required>
            <select id="operation">
                <option value="add">جمع</option>
                <option value="subtract">تفریق</option>
                <option value="multiply">ضرب</option>
                <option value="divide">تقسیم</option>
            </select>
            <button type="submit">محاسبه</button>
        </form>
        <div class="result" id="result"></div>
        <button class="toggle-format" onclick="toggleFormat()">نمایش به عدد</button>
        <div class="history" id="history">
            <h3>تاریخچه</h3>
        </div>
    </div>
    <script>
        let history = [];
        let isBinaryResult = true;

        function calculate(event) {
            event.preventDefault();

            const binary1 = document.getElementById('binary1').value;
            const binary2 = document.getElementById('binary2').value;
            const operation = document.getElementById('operation').value;
            const resultElement = document.getElementById('result');
            const historyElement = document.getElementById('history');

            if (!/^[01]+$/.test(binary1) || !/^[01]+$/.test(binary2)) {
                resultElement.textContent = "لطفا عدد باینری وارد کنید";
                return;
            }

            const num1 = parseInt(binary1, 2);
            const num2 = parseInt(binary2, 2);
            let result;
            let calculation;

            switch (operation) {
                case 'add':
                    result = num1 + num2;
                    calculation = `${num1} (bin: ${binary1}) + ${num2} (bin: ${binary2}) = ${result}`;
                    break;
                case 'subtract':
                    result = num1 - num2;
                    calculation = `${num1} (bin: ${binary1}) - ${num2} (bin: ${binary2}) = ${result}`;
                    break;
                case 'multiply':
                    result = num1 * num2;
                    calculation = `${num1} (bin: ${binary1}) * ${num2} (bin: ${binary2}) = ${result}`;
                    break;
                case 'divide':
                    if (num2 === 0) {
                        resultElement.textContent = "تقسیم بر صفر ممکن نیست";
                        return;
                    }
                    result = Math.floor(num1 / num2);
                    calculation = `${num1} (bin: ${binary1}) ÷ ${num2} (bin: ${binary2}) = ${result}`;
                    break;
                default:
                    resultElement.textContent = "این محاسبات ممکن نیست";
                    return;
            }

            // Update result
            resultElement.textContent = `Result: ${isBinaryResult ? result.toString(2) : result}`;

            // Save to history
            history.push(calculation);

            // Render history
            renderHistory();
        }

        function renderHistory() {
            const historyElement = document.getElementById('history');
            historyElement.innerHTML = "<h3>Calculation History:</h3>";
            history.forEach((item) => {
                const div = document.createElement('div');
                div.className = 'history-item';
                div.textContent = item;
                historyElement.appendChild(div);
            });
        }

        function toggleFormat() {
            isBinaryResult = !isBinaryResult;

            // Update the result display format
            const resultElement = document.getElementById('result');
            if (resultElement.textContent.startsWith("Result:")) {
                const lastCalculation = history[history.length - 1];
                if (lastCalculation) {
                    const result = parseInt(lastCalculation.split("= ")[1]);
                    resultElement.textContent = `Result: ${isBinaryResult ? result.toString(2) : result}`;
                }
            }

            // Update the button text
            const toggleButton = document.querySelector('.toggle-format');
            toggleButton.textContent = isBinaryResult
                ? "تغییر به عدد"
                : "تغییر به باینری";
        }
    </script>
</body>
</html>
