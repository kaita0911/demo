<header class="p-header">
  <div class="head-mv">
    <div class="container"><img src="/assets/images/head-mv.jpg" class="" alt="Hỗ trợ"></div>
  </div>

  <div class="header-top" id="c-header">
    <div class="container">
      <div class="header-top-wrap">
        <div id="menu-toggle" class="sp"><i class="fa-solid fa-list"></i></div>
        <a class="logo" href="{$path_url}/{$lang_prefix}" title="{$logoHome.name_vn}">
          <img src="/{$logoHome.img_thumb_vn}" class="img-responsive" alt="{$logoHome.name_vn}">
        </a>
        <div class="navbar">
          <div class="navbar-toggler pc">Danh mục</div>
          <div class="navbar-collapse" id="mobile-menu">
            {include file='categories_tree.tpl' categories=$categories_tree}
          </div>
        </div>
        <!-- <div class="menu menu_mb" id="mobile-menu">
          <nav class="menutop">
            <ul>
              <li>
                <a href="{$path_url}/{$lang_prefix}" title="{$home|escape:'html'}">
                  {$home|escape:'html'}
                </a>
              </li>
              {foreach from=$menus item=menu}
              <li class="{if $menu.categories|@count > 0}has-sub{/if}">
                <a href="{$path_url}/{$lang_prefix}{$menu.unique_key_detail}">{$menu.name_detail}</a>
                {if $menu.has_sub ==1}
                {if $menu.categories|@count > 0}
                {include file='categories_tree.tpl' categories=$menu.categories level=1}
                <i class="fa-solid fa-angle-down"></i>
                {/if}
                {/if}
              </li>
              {/foreach}
            </ul>
          </nav>

        </div> -->

        <div class="box-search">
          <!-- <span class="ic_search sp"><i class="fa-solid fa-magnifying-glass"></i></span> -->
          <div class="box-search-content">
            {if $searchengine.open eq 1}
            <input class="input-search" type="text" id="search-keyword" placeholder="Nhập từ khóa..." autocomplete="off">
            <div id="suggestions"></div>
            <i class="fa-solid fa-magnifying-glass"></i>
            {else}
            <form action="" method="get" onsubmit="return goSearch(this)">
              <input class="search-input" type="text" name="keyword" id="keyword" placeholder="" required>
              <span class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></span>
            </form>
            {literal}
            <script>
              function goSearch(f) {
                const k = f.keyword.value.trim();
                if (!k) return false;
                window.location.href = '/tim-kiem/' + encodeURIComponent(k);
                return false;
              }
            </script>{/literal}
            {/if}
          </div>
        </div>
        {if $alllanguages|@count > 1}
        <div class="lang-switch">
          {foreach from=$alllanguages item=item}
          <a class="ic-lang" href="{$path_url}/{$item.code}" class="">
            <img src="{$path_url}/assets/images/{$item.code}.png" alt="vi">
          </a>
          {/foreach}
        </div>
        {/if}

        <div class="header-ck pc">
          <i class="fa-solid fa-award"></i>

          <div class="header-ck-co">
            <span>100%</span> Hàng chính hãng
          </div>
        </div>
        <div class="header-hotline pc">
          <i class="fa-solid fa-phone-volume"></i>
          <div class="header-hotline-co">
            <span>Hotline</span> {$hotline.phone}
          </div>
        </div>
        <!-- {if $showcart.open eq 1}
        <a class="header-cart" href="{$path_url}/cart" class="cart-popover btn" title="Shopping Cart">
          <i class="fa-solid fa-cart-shopping"></i>
          <span id="num-cart">0</span>
        </a>
        {/if} -->
      </div>
    </div>
  </div>
  <div class="bg-nav-menu">
    <div class="container">
      <div class="nav-menu">
        {include file='categories_tree_2.tpl' categories=$categories_tree}
      </div>
    </div>
  </div>
</header>