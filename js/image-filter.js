
function imageFilterOn(id){

    const img = document.getElementById('img-'+id);
    
    img.style.filter = 'grayscale(80%)';
    img.style.width = '200px';
    
}

function imageFilterOff(id){

    const img = document.getElementById('img-'+id);
    
    img.style.filter = 'none';
    img.style.width = '220px';

}