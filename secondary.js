 var wrap=document.createElement('div');
        wrap.className='feedcontainer';
    
var count=-1;    

function display()
{      count++;
    var blog=document.createElement('div');
        blog.className='blog';
    
    
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
            
                blog.innerHTML = this.responseText;
                wrap.appendChild(blog);
        document.body.appendChild(wrap);
            }
        };
        xmlhttp.open("GET","fetch.php?q="+count,true);
        xmlhttp.send();
    }
    
    