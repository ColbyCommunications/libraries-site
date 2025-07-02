<?php

if ( 'master' == getenv( 'PLATFORM_BRANCH' ) ) {
    define( 'ALGOLIA_INDEX_NAME_PREFIX', 'prod_libraries_redesign_' );
} else {
    define( 'ALGOLIA_INDEX_NAME_PREFIX', 'platform_libraries_redesign_' );
}