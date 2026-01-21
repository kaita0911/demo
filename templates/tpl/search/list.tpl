<div class="container">
    <ul class="breadcumb">
        <li><a href="./">Trang chủ</a> »</li>
        <li><span>Tìm kiếm</span></li>
    </ul>
    <h1 class="ttl01" itemprop="headline">Tìm kiếm: "{$keyword}"</h1>
    <br>
    <div class="p-products">
        {if $view|@count > 0}
        {foreach from=$view item=item}
        <div class="product-item">
            <a class="product-item__img hover-img" href="{$path_url}/{$lang_prefix}{$item.unique_key}" title="{$item.name_detail}">
                <img src="/{$item.img_thumb_vn}?width=300&height=300&mode=scale" title="{$item.name_detail}" alt="{$item.name_detail}" class="img-cover" loading="lazy">
            </a>
            <h3><a class="product-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}" title="{$item.name_detail}">{$item.name_detail}</a></h3>
            <div class="product-price">
                <span class="price-current">{$item.price_formatted}</span>
                {if $item.priceold > 0 }
                <span class="price-old">{$item.priceold_formatted}</span>
                {/if}
            </div>
        </div>
        {/foreach}
        {else}
        <div class="nodate">Không tìm thấy kết quả</div>
        {/if}

    </div>
    <div id="viewpage" class="pagination"> {$pagination nofilter}</div>
</div>