function preview(){
    var title = "<?php echo $_POST['title'] ?>";
    document.getElementById("title").innerHTML = title;
}

preview();
