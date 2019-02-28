// Add a new task to the To Do list when clicking on the submit button
$('#addTask').click(function(){
    var nameInput = $("[name='taskDescription']");
    var data = {
        'taskDescription': nameInput.val()
    };
    $.ajax({
        type: "POST",
        url: "/todo",
        data: data,
        success: function(data)
        {
            var data = jQuery.parseJSON( data );
            $("ul.tasks").append('' +
                '<li>' +
                '   <span class="task">' + data.taskDescription + '</span> ' +
                '   <button id="' + data.id + '"class="done-button">Mark as done</button>' +
                '</li>');
            nameInput.val("");
        },
        error: function(data)
        {
            alert("ERROR");
        }
    });
});

// Update the status of an existing task in the To Do list and mark it as done when clicking on the Mark as done button
$(document).on('click', 'button.done-button', function(e) {
    var button = this;
    var id = button.id;
    $.ajax({
        type: "PUT",
        url: "/todo/" + id,
        success: function(data)
        {
            var data = jQuery.parseJSON( data );
            if(data.isDone)
            {
                $("#" + id).removeClass("done-button").addClass("delete-button").html("Delete from list");
                $("#" + id).prev().addClass("done");
            }
            else
            {
                alert("ERROR");
            }
        },
        error: function(data)
        {
            alert("ERROR");
        }
    });
});

// Delete a task from the To Do list when clicking on the Delete from list button
$(document).on('click', 'button.delete-button', function(e) {
    var button = this;
    var id = button.id;
    $.ajax({
        type: "DELETE",
        url: "/todo/" + id,
        success: function(data)
        {
            $("#" + id).parent().remove();
        },
        error: function(data)
        {
            alert("ERROR");
        }
    });
});