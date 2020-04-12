$(document).ready(function () {
    $('.siteDetails').on('click', function () {
        let dataSite = $(this).data("site");
        createModal(dataSite);
        $('#modal').modal('show');
    });

    function createModal(dataSite) {
        $('#modal .modal-title').text(dataSite.name);
        $('#modal .title').text(dataSite.name);
        $('#modal .technologies').text(dataSite.technologies);
        $('#modal .description').text(dataSite.description);
        createCarousel(dataSite);
        if (dataSite.url) {
            $('#modal .my-btn')
                .addClass('visible')
                .parent()
                .attr('href', dataSite.url)
        }
    }

    function createCarousel(dataSite){
        let carouselLi = "";
        let carouselItems = "";
        
        // Walk through the colection of images of the site.
        for (let i = 0; i < dataSite.images.length; i++) {
            let image = dataSite.images[i];
            let active = i == 0 ? "active" : "";
            // carouselLi += `<li data-target="#carouselSite" data-slide-to="${i}" class="${active}"></li>`;
            carouselItems += `
            <div class="carousel-item ${active}">
                <img class="d-block w-100" src="static/images/sites/${dataSite.id_site}/${image}">
            </div>
            `;
        }

        let html = `
        <ol class="carousel-indicators">
            ${carouselLi}
        </ol>
        <div class="carousel-inner">
            ${carouselItems}
        </div>
        <a class="carousel-control-prev" href="#carouselSite" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carouselSite" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>`;
        $('#modal #carouselSite').html(html);
    }
})