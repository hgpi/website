$(function () {
    $('#calendar-holder').fullCalendar({
        aspectRatio: 2,
        locale: 'fr',
        eventStartEditable : false,
        header: {
            left: 'prev, next',
            center: 'title',
            right: 'month, basicWeek'
        },
        validRange: {
            start: '2018-03-01',
        },
        themeSystem: 'bootstrap3',
        lazyFetching: true,
        timeFormat: 'H(:mm)',
        // timeFormat: {
        //     agenda: 'h:mmt',
        //     '': 'h:mmt'
        // },
        selectable: true,
        editable: true,
        eventDurationEditable: true,
        eventSources: [
            {
                url: 'http://localhost/hgpa/web/app_dev.php/evenement/load',
                type: 'POST',
                data: {
                },
                error: function(e) {
                    console.log(e);
                }
            }
        ],

        // eventResize: function(event) {
        //     console.log("Entrée dans : eventResize");
        //     var start1 = event.start.format("YYYY-MM-DD HH:mm:ss");
        //     var end1 = event.end.format("YYYY-MM-DD HH:mm:ss");
        //     var xhr = $.ajax({
        //         type: "POST",
        //         url: 'https://.../admin/accueil/calendar/resize',
        //         data: 'action=update&title=' + event.title + '&start=' + start1 + '&end=' + end1 + '&id=' + event.id,
        //         success: function(data) {
        //             console.log(data);
        //             window.location.reload(true);
        //         },
        //         error: function() {
        //             alert("erreur lors de l'appel de l'url dans POST event/resize : contactez l'administrateur du site");
        //         },
        //     });
        // },

        // eventDrop: function(event){
        //     console.log("Entrée dans : eventDrop");
        //     console.log(event);
        //     var start1 = event.start.format("YYYY-MM-DD HH:mm:ss");
        //     var end1 = event.end.format("YYYY-MM-DD HH:mm:ss");
        //
        //     var xhr = $.ajax({
        //
        //         url: 'https://.../admin/accueil/calendar/drop',
        //         data: 'action=update&title=' + event.title+'&start=' + start1 +'&end=' + end1 + '&id=' + event.id ,
        //         type: "POST",
        //         success: function(data) {
        //             console.log(data);
        //             window.location.reload(true);
        //             //alert(json);
        //         },
        //         error: function() {
        //             alert("erreur lors de l'appel de l'url dans POST event/drop : contactez l'administrateur du site");
        //         },
        //     });
        // },

        eventClick:  function(event, jsEvent, view) {
            // endtime = $.fullCalendar.moment(event.end).format('H:mm');
            starttime = $.fullCalendar.moment(event.start).format('dddd, Do MMMM  YYYY, H:mm');
            endtime = $.fullCalendar.moment(event.end).format('dddd, Do MMMM  YYYY, H:mm');
            isAllDay = $.fullCalendar.moment(event.start).format('dddd, Do MMMM  YYYY');

            // var mywhen = starttime + ' - ' + endtime;

            $('#modalTitle').html(event.title);

            $('#debutModal').text(starttime);
            $('#finModal').text(endtime);
            $('#renderingModal').text(event.rendering);
            $('#calendarModal').modal();
        },

    });
    //
    // $('#deleteButton').on('click', function(e){
    //     // We don't want this to act as a link so cancel the link action
    //     confirm('Souhaitez-vous réellement supprimer cet événement?');
    //     e.preventDefault();
    //     doDelete();
    // });
    //
    // function doDelete(){
    //     $("#calendarModal").modal('hide');
    //     var eventID = $('#eventID').val();
    //     $.ajax({
    //         url: 'https://.../admin/accueil/calendar/delete',
    //         data: 'action=delete&id='+eventID,
    //         type: "POST",
    //         success: function(json) {
    //             if(json == 1){
    //                 $("#calendar").fullCalendar('removeEvents',eventID);
    //             } else{
    //                 return false;
    //             }
    //         }
    //     });
    //     $(document).ajaxStop(function(){
    //         window.location.reload();
    //     });
    // }
    //
    // //Editer un evenement
    // $('#editButton').on('click',function () {
    //     var eventID = $('#eventID').val();
    //     //window.location.reload(true);
    //     $("#editModal").modal('show');
    //     console.log('Entrée modal:ok');
    //     console.log(eventID);
    //
    //     $('#saveButton').on('click', function(e){
    //         var newTitle = $('.input_edit_title').val();
    //         var newComm = $('.input_edit_comm').val();
    //         console.log(newTitle);
    //         $.ajax({
    //
    //             url: 'https://.../admin/accueil/calendar/edit/title',
    //             data: 'action=editTitle&id='+eventID+ '&new title=' + newTitle+ '&new comm=' + newComm,
    //             type: "POST",
    //             //dataType : 'json'
    //             success: function(data) {
    //                 console.log(data);
    //                 window.location.reload(true);
    //                 //alert(json);
    //             },
    //         });
    //     });
    // });
});
