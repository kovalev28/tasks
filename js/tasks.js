var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

function showOrHide(cb, id) {
    cb = document.getElementById(cb);

    if (cb.checked) {
        status = 1;
        $.ajax({
            type: "POST",
            url: "../../Admin/UpdateStatus/",
            data: {'id': id, 'status': status},
            success: function (data) {
                alert(data);
            }
        });
    } else
    {
        status2 = 0;
        $.ajax({
            type: "POST",
            url: "../../Admin/UpdateStatus/",
            data: {'id': id, 'status': status2},
            success: function (data) {
                alert(data);
            }
        });
    }
}
