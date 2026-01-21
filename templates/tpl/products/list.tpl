<div class="p-products">
  {foreach from=$view item=item}
  <div class="product-item">
    {if $item.price > 0 && $item.priceold > 0 && $item.priceold > $item.price}
    {math equation="(a - b) / a * 100" a=$item.priceold b=$item.price assign="discount"}
    <span class="discount">-{$discount|round:0}%</span>
    {/if}
    <a class="product-item__img hover-img" href="{$path_url}/{$lang_prefix}{$item.unique_key}" title="{$item.name_detail}">
      <img src="{$item.img_thumb_vn}" title="{$item.name_detail}" alt="{$item.name_detail}" class="img-cover" loading="lazy">
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
</div>
<div id="viewpage" class="pagination"> {$pagination nofilter}</div>