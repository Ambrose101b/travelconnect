$(document).ready(function()
{
    $(".btn-logo").click(function()
    {
        $(".box-slide").toggleClass("click");
        $(".btn-logo").toggleClass("click"); 
        $(".titleBar").toggleClass("titleBar-active");
    });
  
    var depDate = document.getElementById("departure-date");
    depDate.innerText = addDayToDate() + " @ 21:15";
    
    drawBarcode();
});

function addDayToDate()
{
    Date.prototype.monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
    Date.prototype.getMonthName      = function() { return this.monthNames[this.getMonth()]; };
    Date.prototype.getShortMonthName = function() { return this.getMonthName().substr(0, 3); };

    var now  = new Date();
    var next = new Date(now.getTime() + 86400000);
    return next.getShortMonthName() + " " + next.getDate() + " " + next.getFullYear();
}

function drawBarcode()
{
    var bars = "01001100101010110110010001001010101101010011001011001001001101010";
    
    table = $('tr');
    for (var i = 0; i < bars.length; i++)
    {
        if (bars[i] == 1)
          table.append('<td bgcolor="#333"/>');
        else
          table.append('<td bgcolor="#FFF"/>');
    }
}