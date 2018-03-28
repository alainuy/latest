setInterval(displayClock, 1000);

function displayClock() {
        var time = new Date();
        var year = time.getFullYear();
        var month = time.getMonth();
        var day = time.getDay();
        var hrs = time.getHours();
        var min = time.getMinutes();
        var sec = time.getSeconds();
        var en = 'AM';

        if (hrs > 12) {
           en = 'PM';
        }
        if (hrs > 12) {
                hrs = hrs - 12;
        }
        
        if (hrs == 0) {
                hrs = 12;
        }

        if (min < 10){
            min = '0' + min;
        }

        if (sec < 10){
            sec = '0' + sec;
        }

        document.getElementById('realClock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en ;

        setTimeout(displayClock, 1000);

}

displayClock();