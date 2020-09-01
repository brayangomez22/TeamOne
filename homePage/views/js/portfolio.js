$(document).ready(function(){

    //=============================================
    // PORTFOLIO 
    //=============================================

    const grid = new Muuri('.grid', {
        layout: {
            rounding: false
        }
    });
    
    // WE ADDED THE LISTENERS OF THE LINKS TO FILTER BY CATEGORY.
    const enlaces = document.querySelectorAll('#categorias a');
    enlaces.forEach((elemento) => {
        elemento.addEventListener('click', (evento) => {
            evento.preventDefault();
            enlaces.forEach((enlace) => enlace.classList.remove('activo'));
            evento.target.classList.add('activo');

            const categoria = evento.target.innerHTML.toLowerCase();
            categoria === 'todas' ? grid.filter('[data-categoria]') : grid.filter(`[data-categoria="${categoria}"]`);
        });
    });

    // WE ADD THE LISTENER TO THE SEARCH BAR.
    document.querySelector('#barra-busqueda').addEventListener('input', (evento) => {
        const busqueda = evento.target.value;
        grid.filter( (item) => item.getElement().dataset.etiquetas.includes(busqueda) );
    });

    // WE ADD LISTENER FOR THE IMAGES
    const overlay = document.getElementById('overlay');
    document.querySelectorAll('.grid .item img').forEach((elemento) => {
        elemento.addEventListener('click', () => {
            const ruta = elemento.getAttribute('src');
            const descripcion = elemento.parentNode.parentNode.dataset.descripcion;

            overlay.classList.add('activo');
            document.querySelector('#overlay img').src = ruta;
            document.querySelector('#overlay .descripcion').innerHTML = descripcion;
        });
    });

    
    // EVENTLISTENER THE CLOSE BUTTON 
    document.querySelector('#btn-cerrar-popup').addEventListener('click', () => {
        overlay.classList.remove('activo');
    });

    // EVENTLISTENER OF OVERLAY
    overlay.addEventListener('click', (evento) => {
        evento.target.id === 'overlay' ? overlay.classList.remove('activo') : '';
	}); 

})