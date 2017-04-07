<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#order" aria-controls="order" role="tab" data-toggle="tab">По порядку</a></li>
        <li role="presentation"><a href="#name" aria-controls="name" role="tab" data-toggle="tab">По имени</a></li>
        <li role="presentation"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">По e-mail</a></li>
        <li role="presentation"><a href="#status" aria-controls="status" role="tab" data-toggle="tab">По статусу</a></li>
    </ul>

    <?php $HeadFootTable = "    
      <thead>
      <tr>
          <th width=60>ID</th>
          <th width=170>Name</th>
          <th width=170>Email</th>
          <th width=300>Text</th>
          <th width=100>Image</th>
          <th width=50>Status</th>
          <th width=50>Edit</th>
      </tr>
    </thead>
    <tfoot>
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Text</th>
          <th>Image</th>
          <th>Status</th>
          <th>Edit</th>
      </tr >  
    </tfoot>";
    ?>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="order">
            <div class = "container">
                <table class="table table-striped table-bordered table-hover">
                    <?php
                    echo $HeadFootTable;
                    usort($data, build_sorter('id'));
                    foreach ($data as $row) {
                        $checked = ($row["status"] == 1) ? 'checked="checked"' : '';
                        echo '
              <tbody>
               <tr>
                <th>' . $row["id"] . '</th>
                <th>' . $row["username"] . '</th>
                <th>' . $row["mail"] . '</th>
                <th>' . $row["text"] . '</th>
                <th>' . $row["image"] . '</th>
                    <th>
                      <div class="checkbox">
                      <label>
                      <input type="checkbox" ' . $checked . ' id = sdfsf' . $row["id"] . ' onchange="showOrHide(id, ' . $row["id"] . ')"/> 
                      </label>
                      </div>
                    </th>
                <th> <a class="btn" href="/admin/changeview/' . $row["id"] . '"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a> </th> 
                      </button></th>
               </tr   
              </tbody>
              ';
                    }
                    ?>
                </table>
            </div>

        </div>



        <div role="tabpanel" class="tab-pane" id="name">
            <div class = "container">
                <table class="table table-striped table-bordered table-hover">
<?php
echo $HeadFootTable;
usort($data, build_sorter('username'));
foreach ($data as $row) {
    $checked = ($row["status"] == 1) ? 'checked="checked"' : '';
    echo '      
             <tbody>
              <tr>
               <th>' . $row["id"] . '</th>
               <th>' . $row["username"] . '</th>
               <th>' . $row["mail"] . '</th>
               <th>' . $row["text"] . '</th>
                <th>' . $row["image"] . '</th>
                    <th>
                      <div class="checkbox">
                      <label>
                      <input type="checkbox" ' . $checked . ' id = name' . $row["id"] . ' onchange="showOrHide(id, ' . $row["id"] . ')"/> 
                      </label>
                      </div>
                    </th>
                <th> <a class="btn" href="/Admin/ChangeView/' . $row["id"] . '"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a> </th> 
                      </button></th>
               </tr   
              </tbody>
              ';
}
?>    
                </table>
            </div>

        </div>


        <div role="tabpanel" class="tab-pane" id="email">
            <div class = "container">
                <table class="table table-striped table-bordered table-hover">
<?php
echo $HeadFootTable;
usort($data, build_sorter('mail'));
foreach ($data as $row) {
    $checked2 = ($row["status"] == 1) ? 'checked="checked"' : '';
    echo '      
           <tbody>
            <tr>
             <th>' . $row["id"] . '</th>
             <th>' . $row["username"] . '</th>
             <th>' . $row["mail"] . '</th>
             <th>' . $row["text"] . '</th>
                <th>' . $row["image"] . '</th>
                    <th>
                      <div class="checkbox">
                      <label>
                      <input type="checkbox" ' . $checked2 . ' id = mail' . $row["id"] . ' onchange="showOrHide(id, ' . $row["id"] . ')"/> 
                      </label>
                      </div>
                    </th>
                <th> <a class="btn" href="/Admin/ChangeView/' . $row["id"] . '"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a> </th> 
                      </button></th>
               </tr   
              </tbody>
              ';
}
?>
                </table>
            </div>


        </div>


        <div role="tabpanel" class="tab-pane" id="status">
            <div class = "container">
                <table class="table table-striped table-bordered table-hover">
<?php
echo $HeadFootTable;
usort($data, build_sorter('status'));
foreach ($data as $row) {
    $checked3 = ($row["status"] == 1) ? 'checked="checked"' : '';
    echo '        
           <tbody>
            <tr>
             <th>' . $row["id"] . '</th>
             <th>' . $row["username"] . '</th>
             <th>' . $row["mail"] . '</th>
             <th>' . $row["text"] . '</th>
                <th>' . $row["image"] . '</th>
                    <th>
                      <div class="checkbox">
                      <label>
                      <input type="checkbox" ' . $checked3 . ' id = status' . $row["id"] . ' onchange="showOrHide(id, ' . $row["id"] . ')"/> 
                      </label>
                      </div>
                    </th>
                <th> <a class="btn" href="/Admin/ChangeView/' . $row["id"] . '"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a> </th> 
                      </button></th>
               </tr   
              </tbody>
              ';
}
?>
                </table>
            </div>

        </div>
    </div>
</div>


<?php

function build_sorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}
?>
