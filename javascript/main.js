$(()=>{




    $('#signin').on('submit',(e)=>{
        alert('hi')

       let data = document.querySelector('#signin');
       let xml = new XMLHttpRequest;
       xml.open('POST','index.php');
       xml.onreadystatechange =()=>{
        if(xml.readyState == 3){
            $('.siin').val('submiting...')
            $('.siin').attr('disabled','disabled')
            
        }
        if(xml.readyState == 4 && xml.status==200){
            $('.siin').val('continue to chat')
            $('.errm').html(xml.responseText)
          
            $('.siin').attr('disabled',false)
            if(xml.responseText == 'move'){
                window.location.href='home1.php';
            }
            
        }
       }
       xml.send(new FormData(data))
      
       e.preventDefault()
    })
    $('#signup').on('submit',(e)=>{
     
       let data = document.querySelector('#signup');
       let xml = new XMLHttpRequest;
       xml.open('POST','signup.php');
       xml.onreadystatechange =()=>{
        if(xml.readyState == 3){
            $('.supp').val('submiting...')
            $('.supp').attr('disabled','disabled')
            
        }
        if(xml.readyState == 4 && xml.status==200){
            $('.supp').val('continue to chat')
            $('.erm').html(xml.responseText)
            $('.supp').attr('disabled',false)
            if(xml.responseText == 'move'){
                window.location.href='index.php';
            }
            $('.r').val('');
        }
       }
       xml.send(new FormData(data))
       e.preventDefault()
    })
//post//
    $('#postf').on('submit',(e)=>{
       
        let data = document.querySelector('#postf');
        let xml = new XMLHttpRequest;
        xml.open('POST','home1.php');
        xml.onreadystatechange =()=>{
         if(xml.readyState == 3){
           
             $('.postb').attr('disabled','disabled')
             
         }
         if(xml.readyState == 4 && xml.status==200){
           
             console.log(xml.responseText)
             $('.postb').attr('disabled',false)
             $('.aap').prepend(xml.responseText);
           
             $('.r').val('');
         }
        }
        xml.send(  new FormData(data))
        e.preventDefault()
    })
})