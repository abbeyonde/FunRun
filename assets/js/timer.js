(function () {
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        dayMonth = "2/14/",
        event_year = 2024;
        event_date = dayMonth + event_year;

    today = mm + "/" + dd + "/" + yyyy;
    if (today > event_date) {
            event_date = dayMonth + event_year;
        }
        //end
    
        const countDown = new Date(event_date).getTime(),
            x = setInterval(function () {
        
                    const now = new Date().getTime(),
                        distance = countDown - now;
        
                    document.getElementById("days").innerText = Math.floor(distance / (day)),
                        document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                        document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                        document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
        
                    //do something later when date is reached
                    if (distance < 0) {
                            document.getElementById("cd-headline").innerText = "It's Run Day!";
                            document.getElementById("countdown").style.display = "none";
                            document.getElementById("content").style.display = "block";
                            clearInterval(x);
                        }
                        //seconds
                    }, 0)
            }());