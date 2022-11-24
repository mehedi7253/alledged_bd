
<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"

         xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"

         xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
    <loc>{{ url('/')}}</loc>
    <lastmod>{{ gmdate(DateTime::W3C, strtotime(date('Y-m-d h:i:sa'))) }}</lastmod>
    <priority>1.00</priority>
    </url>
   @foreach($urls as $url)
   <url>
       @if($url->outer_link)
     <loc>{{ url($url->outer_link)}}</loc>
     @else
     <loc>{{ url('/'.$url->slug)}}</loc>
     @endif
     <lastmod>{{ gmdate(DateTime::W3C, strtotime($url->updated_at)) }}</lastmod>
     <priority>1.00</priority>
   </url>
   @endforeach
</urlset>
