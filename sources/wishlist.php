<?php
include_once(__DIR__ . "/../includes/config.php");


$session_id = session_id();

// Lấy sản phẩm trong wishlist
$sql = "
    SELECT 
        a.id,
        a.img_thumb_vn,
        d.name,
        d.unique_key,
        p.priceold,
        COALESCE(
            NULLIF(p.price, 0),
            (
                SELECT att.price
                FROM {$GLOBALS['db_sp']}.articlelist_attributes att
                INNER JOIN {$GLOBALS['db_sp']}.articlelist_codes c
                    ON c.id = att.code_id
                WHERE c.articlelist_id = a.id
                    AND att.price > 0
                ORDER BY att.sort_order ASC
                LIMIT 1
            )
        ) AS price
    FROM {$GLOBALS['db_sp']}.wishlist w
    INNER JOIN {$GLOBALS['db_sp']}.articlelist a 
        ON a.id = w.product_id
    LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail d 
        ON d.articlelist_id = a.id AND d.languageid = {$langid}
    LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price p 
        ON p.articlelist_id = a.id
    WHERE w.session_id = '{$session_id}'
    ORDER BY w.created_at DESC
";

$wishlist = $GLOBALS['sp']->getAll($sql);

// format giá
foreach ($wishlist as &$item) {
    $item['price_formatted'] = !empty($item['price'])
        ? number_format($item['price'], 0, ',', '.') . '₫'
        : $contact;

    $item['priceold_formatted'] = !empty($item['priceold'])
        ? number_format($item['priceold'], 0, ',', '.') . '₫'
        : '';
}

$smarty->assign("wishlist", $wishlist);

$smarty->display("./head.tpl");
$smarty->display("./header.tpl");
$smarty->display("./wishlist/list.tpl");
$smarty->display("./footer.tpl");
$smarty->display("./js.tpl");
