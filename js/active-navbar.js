const sections = document.querySelectorAll('section');
const links = document.querySelectorAll('nav a');
const main = document.querySelector('main');

main.addEventListener('scroll',()=>{

    sections.forEach(section =>{

        const top = main.scrollTop;
        const offset = section.offsetTop - 300;
        const height = section.offsetHeight;
        const id = section.getAttribute('id');
        
        if(top >= offset && top < offset + height){

            links.forEach(link =>{

                link.classList.remove('active');
                document.querySelector('[href*=' + id + ']').classList.add('active');
                
            });

        }

    });   

});
