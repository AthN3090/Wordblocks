 var wrap=document.createElement('div');
        wrap.className='feedcontainer';
    
var count=0;    

function display()
{    
        http = new XMLHttpRequest();
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var blogObj = JSON.parse(this.responseText);
                var container = document.getElementById('blogbox');
                var blog = document.createElement('div');
                blog.setAttribute("class","blog");
                var title = document.createElement('div');
                title.setAttribute("class","blog_title");
                console.log(blogObj.title);
                title.innerHTML = blogObj.title;
                var details = document.createElement('div');
                details.setAttribute("class","blog_details");
                details.innerHTML=blogObj.date + " &middot " + "<b>" + blogObj.blogger + "</b> &middot " + "<span class='category'>#" + blogObj.category + "</span>";
                var content = document.createElement('div');
                content.setAttribute("class","content");
                content.innerHTML = blogObj.body;
                var options = document.createElement('div');
                options.setAttribute("class","blog_options");
                var heart = document.createElement('img');
                heart.setAttribute("class","likes_image");
                heart.setAttribute("id",blogObj.id + 0);
                heart.setAttribute("src","./images/like.png");
                heart.setAttribute("onclick","liked(this.id)");
                var likes = document.createElement('span');
                likes.setAttribute("class","likes");
                likes.setAttribute("id",blogObj.id);
                likes.innerHTML=" "+ blogObj.likes;
                options.appendChild(heart);
                options.appendChild(likes);
                blog.appendChild(title);
                blog.appendChild(details);
                blog.appendChild(content);
                blog.appendChild(options);
                container.appendChild(blog);

            }           

        };
        http.open("GET","fetch.php?q="+count,true);
        http.send();
        count++;
    }
    
    var count1=0;    

function display_indi()
{    
        http = new XMLHttpRequest();
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var blogObj = JSON.parse(this.responseText);
                var container = document.getElementById('blogbox');
                var blog = document.createElement('div');
                blog.setAttribute("class","blog");
                var title = document.createElement('div');
                title.setAttribute("class","blog_title");
                console.log(blogObj.title);
                title.innerHTML = blogObj.title;
                var details = document.createElement('div');
                details.setAttribute("class","blog_details");
                details.innerHTML=blogObj.date + " &middot " + "<b>" + blogObj.blogger + "</b> &middot " + "<span class='category'>#" + blogObj.category + "</span>";
                var content = document.createElement('div');
                content.setAttribute("class","content");
                content.innerHTML = blogObj.body;
                var options = document.createElement('div');
                options.setAttribute("class","blog_options");
                var heart = document.createElement('img');
                heart.setAttribute("class","likes_image");
                heart.setAttribute("id",blogObj.id + 0);
                heart.setAttribute("src","./images/like.png");
                //heart.setAttribute("onclick","liked(this.id)");
                var likes = document.createElement('span');
                likes.setAttribute("class","likes");
                likes.setAttribute("id",blogObj.id);
                likes.innerHTML=" "+ blogObj.likes;
                /*var edit = document.createElement('img');
                edit.setAttribute("class","likes_image");
                edit.setAttribute("id",blogObj.id);
                edit.setAttribute("style","float: right;margin-left:10px;");
                edit.setAttribute("src","./images/edit_blog.png");
                edit.setAttribute("onclick","edit(this.id)");
                edit.setAttribute("name","edit_blog");*/
                var trash = document.createElement('img');
                trash.setAttribute("class","likes_image");
                trash.setAttribute("id",blogObj.id);
                trash.setAttribute("style","float: right;margin-left:10px;");
                trash.setAttribute("src","./images/trash.png");
                trash.setAttribute("onclick","deleteblog(this.id)");
                trash.setAttribute("name","delete_blog");
                options.appendChild(heart);
                options.appendChild(likes);
                options.appendChild(trash);
               // options.appendChild(edit);
                blog.appendChild(title);
                blog.appendChild(details);
                blog.appendChild(content);
                blog.appendChild(options);
                container.appendChild(blog);

            }           

        };
        http.open("GET","idfetch.php?q="+count1,true);
        http.send();
        count1++;
    }
    function liked(id){
      var  new_id = parseInt(id) / 10;
        var likes = document.getElementById(new_id);
        var new_likes = parseInt(likes.innerHTML) + 1;
        var http = new XMLHttpRequest();
        http.onreadystatechange = function(){
            if(http.readyState == 4 && http.status == 200){

                console.log(this.responseText);
                likes.innerHTML = " "+this.responseText;        
            }
        }
    
        http.open("POST","./likes.php",true);
        http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        http.send("likes=" + new_likes + "&id="+new_id);

    }
    
function edit(id){
    var http = new XMLHttpRequest();
    var form = document.getElementById('editor_form');
    var reference = document.getElementsByName('blog_edit')[0];
    var texteditor = document.createElement('textarea');
    texteditor.setAttribute('name',"editor");
    texteditor.setAttribute('id','edit_body')
   /* var post = document.createElement('input');
    var cancel = document.createElement('button');
    post.setAttribute("class","btn btn-outline-success");
    post.setAttribute("type","submit");
    post.setAttribute("name","blog_edit");
    post.setAttribute("value","Post");
    post.setAttribute("style","margin-top:7px;float:right;")
    cancel.setAttribute("type","button");
    cancel.setAttribute("style","margin-top:7px;")
    cancel.setAttribute("id","cancel_edit");
    cancel.innerHTML = "Cancel";
    cancel.setAttribute("class","btn btn-outline-danger");*/
    
    form.insertBefore(texteditor, reference );
   // form.appendChild(post);
   // form.appendChild(cancel);
    var post = document.getElementsByName('blog_edit')[0];
    var title = document.getElementById('edit_title');
    var category = document.getElementById('edit_category');
    var body = document.getElementById('edit_body');
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var blogObj = JSON.parse(this.responseText);
            title.value = blogObj.title;
            category.value = blogObj.category;
            body.innerHTML = blogObj.body;
            post.setAttribute("id",blogObj.id+"00");
            CKEDITOR.replace('editor');
            CKEDITOR.config.height = 230;
            CKEDITOR.config.resize_enabled = true;
            $("#editorback").fadeIn(300);
            

        }
    }
    http.open("GET","./editblog.php?q="+id,true);
    http.send();

}
function deleteblog(id){
    var http = new XMLHttpRequest();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

            location.reload();
            console.log(this.responseText);


        }
    }
    http.open("POST","deleteblog.php",true);
    http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    http.send("index="+id);
}

/*function updateblog(id){
    
    var  new_id = parseInt(id) / 100;
    
    var title = document.getElementById('edit_title').value;
    var category = document.getElementById('edit_category').value;
    var body = document.getElementById('edit_body').value;
    var blog = JSON.stringify({'id': new_id,'title':title,'category':category,'body':body});
    console.log(blog);


    var http = new XMLHttpRequest();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
               
            
        }
    }

    http.open("POST","./updateblog.php",true);
    http.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    http.send(blog);

    
}*/
var count3=0;
function display_search_result(search)
{    
        http = new XMLHttpRequest();
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var blogObj = JSON.parse(this.responseText);
                var container = document.getElementById('blogbox');
                var blog = document.createElement('div');
                blog.setAttribute("class","blog");
                var title = document.createElement('div');
                title.setAttribute("class","blog_title");
                console.log(blogObj.title);
                title.innerHTML = blogObj.title;
                var details = document.createElement('div');
                details.setAttribute("class","blog_details");
                details.innerHTML=blogObj.date + " &middot " + "<b>" + blogObj.blogger + "</b> &middot " + "<span class='category'>#" + blogObj.category + "</span>";
                var content = document.createElement('div');
                content.setAttribute("class","content");
                content.innerHTML = blogObj.body;
                var options = document.createElement('div');
                options.setAttribute("class","blog_options");
                var heart = document.createElement('img');
                heart.setAttribute("class","likes_image");
                heart.setAttribute("id",blogObj.id + 0);
                heart.setAttribute("src","./images/like.png");
                heart.setAttribute("onclick","liked(this.id)");
                var likes = document.createElement('span');
                likes.setAttribute("class","likes");
                likes.setAttribute("id",blogObj.id);
                likes.innerHTML=" "+ blogObj.likes;
                options.appendChild(heart);
                options.appendChild(likes);
                blog.appendChild(title);
                blog.appendChild(details);
                blog.appendChild(content);
                blog.appendChild(options);
                container.appendChild(blog);

            }           

        };
        http.open("POST","search_response.php",true);
        http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        http.send("index="+count3+"&search="+search);
        count3++;
    }