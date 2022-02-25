function chose()
{
    var rd1=document.getElementById('rd1');
    var rd2=document.getElementById('rd2');

    if(rd1.checked)
    {
        // alert('Radio1');
        document.getElementById('test').style.display='none';
    }
    if(rd2.checked)
    {
        // alert('Radio2');
        document.getElementById('test').style.display='block';
    }
    
    

    // if(x==0)
    //     document.getElementById('test').style.display='block';
    // else
    //     document.getElementById('test').style.display='none';

    return;
}