Date.prototype.getWeek = function() {
    var onejan = new Date(this.getFullYear(),0,1);
    return Math.ceil((((this - onejan) / 86400000) + onejan.getDay()+1)/7);
}


function refreshShifts(yearWeek) {
    //I guess bootstrap's jquery doesn't contain $.get so here is the javascript
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            $("#shiftContainer").html(this.responseText);
        }
    }
    xhttp.open("GET", "getShifts.php?week="+yearWeek, true)
    xhttp.send()
}

$('#editShiftModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var shift = button.data('shiftid') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('#posName').val("position " + shift)
})

$(function() {
    //Change the appearance of the nav bar to indicate current tab
    $('#schedule-tab').toggleClass("active")
    $('#schedule-tab').attr("aria-selected", "true")
    
    //Add event listener to week selector
    $('#weekSelector').change(function() {
        refreshShifts(document.getElementById("weekSelector").value)
    })
    
    //Populate the weekSelector with the specified week
    var curDate = new Date()
    var curWeek = curDate.getFullYear() + "-W" + curDate.getWeek()
    $('#weekSelector').attr("value", curWeek)
    
    //Populate the Calendar with the selected week's shifts
    refreshShifts(curWeek);
    

})