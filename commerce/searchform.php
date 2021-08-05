<div class="items item--quicksearch halo-search">
    <div id="quickSearch" data-prevent-quick-search-close>
        <form class="form" action="/search.php">
            <fieldset class="form-fieldset">
                <div class="form-field">
                    <div id="haloSearchCategory">
                        <label class="is-srOnly" for="search_category_query">All
                            Categories</label>
                        <select name="category" class="halo-select-category" id="search_category_query">
                            <option value="" selected="">All Categories</option>
                            <?php
                                $categories = get_taxonomy_hierarchy( 'product_cat' );
                                foreach( $categories as $category ):
                            ?>
                                <option value="<?php echo $category->term_id;?>">--- <?php echo $category->name;?></option>
                                <?php
                                    foreach( $category->children as $child ):
                                ?>
                                    <option value="<?php echo $child->term_id;?>">------ <?php echo $child->name;?></option>
                                <?php
                                    endforeach;
                                endforeach;
                            ?>
                        </select>
                        <svg class="icon" aria-hidden="true">
                            <use
                                xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down" />
                            </svg>
                    </div>
                    <label class="is-srOnly" for="search_query">Search</label>
                    <input class="form-input" 
                           data-search-quick name="search_query" 
                           id="search_query"
                           data-error-message="Search field cannot be empty." 
                           placeholder="What are you looking for?"
                           autocomplete="off">
                    <button type="submit" 
                            class="button button--primary" 
                            aria-label="Search button">
                        <svg class="icon"
                            aria-hidden="true">
                            <use
                                xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-search">
                            </use>
                        </svg></button>
                </div>
            </fieldset>
        </form>
        <div class="haloQuickSearchResults quickSearchResults" data-bind="html: results"></div>
        <div class="haloQuickSearchResults quickSearchResultsCustom">
            <div class="quickResults-wrapper">
                <div class="quickResults-item quickResults-text">
                    <h3 class="quickResults-title">Trending Now</h3>
                    <ul class="productGrid-search">
                        <li class="search-item">
                            <a class="link" href="/search.php?search_query=canvas&section=product">
                                <svg class="icon" aria-hidden="true">
                                    <use
                                        xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-search">
                                    </use>
                                </svg>Canvas
                            </a>
                        </li>
                        <li class="search-item">
                            <a class="link" href="/search.php?search_query=male&section=product">
                                <svg class="icon" aria-hidden="true">
                                    <use
                                        xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-search">
                                    </use>
                                </svg>Male
                            </a>
                        </li>
                        <li class="search-item">
                            <a class="link" href="/search.php?search_query=female&section=product">
                                <svg class="icon" aria-hidden="true">
                                    <use
                                        xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-search">
                                    </use>
                                </svg>Female
                            </a>
                        </li>
                        <li class="search-item">
                            <a class="link" href="/search.php?search_query=family&section=product">
                                <svg class="icon" aria-hidden="true">
                                    <use
                                        xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-search">
                                    </use>
                                </svg>Family
                            </a>
                        </li>
                        <li class="search-item">
                            <a class="link" href="/search.php?search_query=children&section=product">
                                <svg class="icon" aria-hidden="true">
                                    <use
                                        xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-search">
                                    </use>
                                </svg>Children
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="quickResults-item quickResults-product">
                    <h3 class="quickResults-title">Most Popular</h3>
                    <div class="loadingOverlay"></div>
                    <ul class="productGrid"></ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($){

        })
    </script>
</div>
