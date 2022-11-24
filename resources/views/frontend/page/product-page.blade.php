@extends('frontend.layout.app')
@section('title')
    {{ $title }}
@endsection

@section('homeContent')
    <div class="events-page" style="background-image: url({{ asset($menu->background_image) }}); 
    background-position: center;
    background-repeat: no-repeat; height: auto;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-ms-12">
                    <div class="heading-2">
                        <h2 class="" data-aos="fade-up" data-aos-duration="3000">{{ $menu->name }}</h2>
                        <br>
                        <p class="" data-aos="fade-up" data-aos-duration="3000">{{ $menu->heading }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container catelogs-tabs">
        <div class="row mt-5">
            <?php $categories = DB::table('blog_categories')->whereNull('parent')->get(); ?>
            <div class="col-md-3">
                <div class="form-group">
                    <select id="category" class="form-control" onchange="return getData()">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select id="subCategory" class="form-control"  onchange="return changeSubCategory()">

                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select id="brand" class="form-control" onchange="return changeSubCategory()">
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select id="productType" class="form-control" onchange="return changeSubCategory()">
                        <option value="1">Design</option>
                        <option value="2">Catalogue</option>
                        <option value="3">Technical Specification</option>
                    </select>
                </div>
            </div>

        </div>
    </div>

    <section id="overview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-3" data-aos="fade-up" data-aos-duration="3000" id="name"></h4>
                    <p class="" data-aos="fade-up" data-aos-duration="3000" id="title">
                    </P>
                    <p class="" data-aos="fade-up" data-aos-duration="3000" id="short_description">
                    </P>
                    <p class="" data-aos="fade-up" data-aos-duration="3000" id="description">
                    </P>
                    <div class="row" id="productList">
                        
                    </div>
                </div>
            </div>
        </div>
        <br>
        </div>
    </section>
    <script>
        $(window).on('load', function() {
            getData();
        })
        function getData(){
            const categoryID = $("#category").val();
            getSubCategory(categoryID)
            getBrand(categoryID)
        };
        function changeSubCategory(){
            var subCat = $("#subCategory").val();
            var brand = $("#brand").val();
            $.ajax({
                type: "GET",
                url: "/sub-category-detail/"+subCat,
                dataType: "json",
                success: function(result){
                    if (result) {
                        $("#name").html(result.name);
                        $("#title").html(result.title);
                        $("#short_description").html(result.short_description);
                        $("#description").html(result.description);
                    }
                }
            });
            getProduct(subCat,brand);
        };
        function getSubCategory(category){
            $('#subCategory').empty();
            $.ajax({
                type: "GET",
                url: "/sub-category/"+category,
                dataType: "json",
                success: function(result){
                    if (result.length > 0) {
                        $("#name").html(result[0].name);
                        $("#title").html(result[0].title);
                        $("#short_description").html(result[0].short_description);
                        $("#description").html(result[0].description);
                        result.forEach(element => {
                            $('#subCategory').append($('<option>', { 
                                value: element.id,
                                text : element.name 
                            }));
                        });
                    }
                }
            });
        };
        function getBrand(category){
            $('#brand').empty();
            $.ajax({
                type: "GET",
                url: "/brand/"+category,
                dataType: "json",
                success: function(result){
                    if (result.length > 0) {
                        result.forEach(element => {
                            $('#brand').append($('<option>', { 
                                value: element.id,
                                text : element.name 
                            }));
                        });
                        var subCat = $("#subCategory").val();
                        var brand = $("#brand").val();
                        getProduct(subCat,brand);
                    }
                }
            });
        };
        function getProduct(cat,brand) {
            $.ajax({
                type: "GET",
                url: "/products/"+cat+"/"+brand,
                dataType: "json",
                success: function(products){
                    if (products.length > 0) {
                        var productType = $("#productType").val();
                        if (productType == 1) {
                            var designHtml = '';
                            products.forEach(design => {
                                designHtml+= '<div class="col-md-3">'+
                                                '<div class="video mt-3">'+
                                                    '<iframe width="100%" height="200" src="https://www.youtube.com/embed/'+design.video_code+'" title="'+design.name+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'+
                                                '</div>'+
                                            '</div>';
                            });
                            $("#productList").html(designHtml);
                        }
                        if (productType == 2) {
                            var catalogHtml = '';
                            products.forEach(catalog => {
                                catalogHtml+= '<div class="col-md-3">'+
                                                    '<div class="Greetings-images mb-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">'+
                                                        '<img src="/'+catalog.image+'">'+
                                                        '<p>'+catalog.name+'</p>'+
                                                    '</div>'+
                                                '</div>';
                            });
                            $("#productList").html(catalogHtml);
                        }
                        if (productType == 3) {
                            var tecnicalHtml = '';
                            products.forEach(tecnical => {
                                tecnicalHtml+= '<div class="col-md-2 mb-3">'+
                                                    '<div class="Greetings-images mb-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">'+
                                                        '<a href="/'+tecnical.pdf_file+'" target="_blank">'+
                                                            '<img src="/assets/frontend/image/pdf.png">'+
                                                            '<p>'+tecnical.name+'</p>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>';
                            });
                            $("#productList").html(tecnicalHtml);
                        }
                    }else{
                        $("#name").html('');
                        $("#title").html('');
                        $("#short_description").html('');
                        $("#description").html('');
                        $("#productList").html('');
                    }
                }
            });
        };
    </script>
@endsection
