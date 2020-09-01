// SLIMSCROLL FOR CHAT WIDGET
$('#chat-box').slimScroll({
    height: '250px'
});

// Product Constructor
class ChatGroup {
    constructor(name, photo, comment) {
        this.name = name;
        this.photo = photo;
        this.comment = comment;
    }
}

// UI Constructor
class UI {
    addProduct(newComment) {
        const newCommentGroup = document.getElementById('chat-box');
        const element = document.createElement('div');
        element.innerHTML = `
            <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">${newComment.name}</span>
                    <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                </div>
                <img class="direct-chat-img" src="${newComment.photo}" alt="message user image">
                <div class="direct-chat-text">${newComment.comment}</div>
            </div>
        `;
        newCommentGroup.appendChild(element);

        newCommentGroup.scrollTop = newCommentGroup.scrollHeight;
    }

    resetForm() {
        document.getElementById('form-chatGroup').reset();
    }
}

// DOM Events
document.getElementById('form-chatGroup')
    .addEventListener('submit', function (e) {

    const name = document.getElementById('nameUserChatGroup').value,
        photo = document.getElementById('photoUserChatGroup').value,
        comment = document.getElementById('commentChatGroup').value;
        group = document.getElementById('groupChatGroup').value;
        id = document.getElementById('idUserChatGroup').value;

    // Create a new Comment
    const newComment = new ChatGroup(name, photo, comment);

    // Create a new UI
    const ui = new UI();

    // Save Comment
    ui.addProduct(newComment);
    ui.resetForm();

    e.preventDefault();

    //=============================================
    // CREATE A NEW COMMENT IN BD 
    //=============================================

    var data = new FormData();
    data.append("name", name);
    data.append("photo", photo);
    data.append("comment", comment);
    data.append("group", group);
    data.append("id", id);

    $.ajax({
        url: "ajax/chatGroup.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
            // console.log(respuesta);
        }
    });

});