<div class="col-lg-12">
    <div class="col-lg-5">
        <div class="col-lg-10 col-lg-offset-2">
            <h2 class="col-lg-12" style="color: darkgreen"><b>Редактировать</b></h2>  
            <hr class="col-lg-12">
            <h4 class="col-lg-12">                
                <form enctype="multipart/form-data" action="/Admin/Update/<?php echo $data["id"] ?>" method="post">
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                    <div class="form-group">
                        <label for="username">Имя</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $data["username"] ?>" required="">
                    </div>                   

                    <div class="form-group">
                        <label for="text">Текст</label>
                        <textarea class="form-control" name="text" rows="3" required=""><?php echo $data['text'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mail">Адрес электронной почты</label>
                        <input type="email" class="form-control" name="mail" value="<?php echo $data["mail"] ?>" required="">
                    </div>  

                    <hr class="col-lg-12">

                    <button type="submit" class="btn btn-default">Сохранить</button>
                </form>
            </h4>
        </div>
    </div>
    <div class="col-lg-5 col-lg-offset-2">
        <img src="../../images/download/<?php echo $data['image'] ?>" class="img-responsive" alt="Responsive image">
    </div>
</div>