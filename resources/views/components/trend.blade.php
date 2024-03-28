
    <canvas id="myLineChart"></canvas>
    <script>
        // HTMLのCanvas要素からコンテキストを取得する
const lineCtx = document.getElementById('myLineChart').getContext('2d');


let test =@json($records);
console.log(test[0].diff_time);

// グラフの設定を含むオブジェクトを定義する
const lineConfig = {
    type: 'line', // グラフの種類を指定する（この場合は折れ線グラフ）
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My Dataset',
            data: [, test[0].diff_time,test[0].diff_time ,test[0].diff_time , 9, 55, 40],
            borderColor: 'rgb(75, 192, 192)',
        }]
    },
    options: {
        // グラフのオプションを指定する（例：軸の設定、タイトルの設定など）
    }
};

// Chart.jsを使用して折れ線グラフを描画する
let line = new Chart(lineCtx, lineConfig);
    </script>

