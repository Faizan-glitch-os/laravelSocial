<div x-data='{isOpen: false}'>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <a x-on:click="isOpen = ! isOpen; setTimeout(() => document.querySelector('#live-search-field').focus(),50)" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>

    <div class="search-overlay" x-bind:class="isOpen ? 'search-overlay--visible' : ''">
        <div class="search-overlay-top shadow-sm">
            <div class="container container--narrow">
                <label for="live-search-field" class="search-overlay-icon"><i class="fas fa-search"></i></label>
                <input autocomplete="off" type="text" id="live-search-field" class="live-search-field" placeholder="What are you interested in?">
                <span class="close-live-search" x-on:click="isOpen = ! isOpen"><i class="fas fa-times-circle"></i></span>
            </div>
        </div>

        <div class="search-overlay-bottom">
            <div class="container container--narrow py-3">
                <div class="circle-loader"></div>
                <div class="live-search-results"></div>
            </div>
        </div>
    </div>
</div>
