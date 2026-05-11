<?php
// Patch posterId + posterUrl into hero blocks for home, sell, and grow pages.

$pages = [
    6  => [ 'id' => 76, 'url' => 'https://uiiq.co.uk/wp-content/uploads/2026/05/home-hero.jpg' ],
    7  => [ 'id' => 77, 'url' => 'https://uiiq.co.uk/wp-content/uploads/2026/05/sell-hero.jpg' ],
    8  => [ 'id' => 78, 'url' => 'https://uiiq.co.uk/wp-content/uploads/2026/05/grow-hero.jpg' ],
];

foreach ( $pages as $post_id => $img ) {
    $post    = get_post( $post_id );
    $content = $post->post_content;

    // Replace the self-closing hero-media block: insert posterId + posterUrl before the closing } /-->
    // Matches: ,"textAlign":"left"} /--> (the last attribute before block close)
    $old = '"textAlign":"left"} /-->';
    $new = '"textAlign":"left","posterId":' . $img['id'] . ',"posterUrl":"' . $img['url'] . '"} /-->';

    if ( strpos( $content, $new ) !== false ) {
        echo "Page {$post_id}: image already set, skipping.\n";
        continue;
    }

    if ( strpos( $content, $old ) === false ) {
        echo "Page {$post_id}: hero block pattern not found — check manually.\n";
        continue;
    }

    $updated = str_replace( $old, $new, $content );

    wp_update_post( [
        'ID'           => $post_id,
        'post_content' => $updated,
    ] );

    echo "Page {$post_id}: hero image updated (attachment {$img['id']}).\n";
}
