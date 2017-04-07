<div class="col-lg-12">
    <div class="col-lg-5">
        <div class="col-lg-10 col-lg-offset-2">
            <h2 class="col-lg-12" style="color: darkgreen"><b>Добавление задачи</b></h2>  
            <hr class="col-lg-12">
            <h4 class="col-lg-12">                
                <form enctype="multipart/form-data" action="/main/add" method="post">

                    <div class="form-group">
                        <label for="username">Введите имя</label>
                        <input type="text" class="form-control" name="username" placeholder="Name" required="" id="username">
                    </div>

                    <div class="form-group">
                        <label for="mail">Введите адрес электронной почты</label>
                        <input type="email" class="form-control" name="mail" placeholder="Email" required="" id="email">
                    </div>                     

                    <div class="form-group">
                        <label for="text">Введите текст задания</label>
                        <textarea class="form-control" name="text" placeholder="Text" required="" id="text" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="File">Загрузить изображение</label>
                        <input type="file"  name="uploadfile" onchange="loadFile(event)">
                    </div>                     
                    <hr class="col-lg-12">
                    <button type="button" name="submit" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                        Предварительный просмотр
                    </button>
                    <button type="submit" class="btn btn-default">Отправить</button>
                </form>
            </h4>
        </div>
    </div>
    <div class="col-lg-5 col-lg-offset-2">
        <img src="images/index.jpg" class="img-responsive" alt="Responsive image">
    </div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Предварительный просмотр</h3>
            </div>



            <div class="col-lg-12" style="padding-top:20px;">
                <div class="col-lg-7">
                    <div class="col-lg-12">
                        <h4 class="col-lg-12">                
                            <form enctype="multipart/form-data" action="/Main/Add" method="post">
                                <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                                <div><label for="username" id = "result1">Ваше имя</label></div>
                                <hr class="col-lg-12">
                                <div><label for="username" id = "result3" style="word-break: break-all;">Текст</label></div>
                                <div align="right"><label for="username" id = "result2" style="padding-top:20px;">Почта</label></div>

                        </h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img id="output" class="img-responsive"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>

        </div>
    </div>

    <script>
        function showValue() {
            result1.innerHTML = username.value;

        }
        username.onkeyup = showValue;
    </script>    
    <script>
        function showValue() {
            result2.innerHTML = email.value;
        }

        email.onkeyup = showValue;
    </script>  
    <script>
        function showValue() {
            result3.innerHTML = text.value;
        }

        text.onkeyup = showValue;
    </script>  
