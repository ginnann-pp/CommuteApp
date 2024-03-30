
    <canvas id="myLineChart"></canvas>
    <script>
        // HTMLのCanvas要素からコンテキストを取得する
const lineCtx = document.getElementById('myLineChart').getContext('2d');


// このデーターを渡したい
let test =@json($records);
// 要素割る60
test = test.map(obj => {
    return{...obj, diff_time: obj.diff_time / 60};
})

console.log(test); // 結果を出力

// 日付作成
function getPastSevenDays() {
    let DateArray = [];
    for (let i = 0; i < 7; i++) {
        let currentDate = new Date();
        currentDate.setDate(currentDate.getDate() - i);
        let month = String(currentDate.getMonth() + 1).padStart(2, '0');
        let day = String(currentDate.getDate()).padStart(2, '0');
        let formattedDate = month + '/' + day;
        DateArray.unshift(formattedDate);
    }
    return DateArray;
}

// 過去7日間の日付を取得
let pastSevenDays = getPastSevenDays();

console.log(pastSevenDays)
//

let today = new Date();
let diffTimeArray = [];

for(let i = 0; i < 7; i++) {
    let currentDate = new Date(today);
    currentDate.setDate(today.getDate() - i)

    let foundData = test.find(obj => {
    let arrivalDate = new Date(obj.arrival_time);
    return arrivalDate.toDateString() === currentDate.toDateString();
});

    // データが見つかった場合は diff_time を配列に格納、見つからない場合は 0 を格納
    if (foundData) {
        // unshiftで先頭からデーターを挿入
        diffTimeArray.unshift(foundData.diff_time);
    } else {
        diffTimeArray.unshift(0);
    }
}
console.log(diffTimeArray);

// グラフの設定を含むオブジェクトを定義する
const lineConfig = {
    type: 'line', // グラフの種類を指定する（この場合は折れ線グラフ）
    data: {
        labels: pastSevenDays,
        datasets: [{
            label: '7日間の通勤時間',
            data: diffTimeArray,
            borderColor: 'rgb(75, 192, 192)',
            animation: false,
        }]
    },
    options: {
        // グラフのオプションを指定する（例：軸の設定、タイトルの設定など）
    }
};

// Chart.jsを使用して折れ線グラフを描画する
let line = new Chart(lineCtx, lineConfig);
    </script>

