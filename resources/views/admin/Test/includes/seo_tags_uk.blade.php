@php
    if(isset($page)){
        $desc = old('meta_description["uk"]') ? old('meta_description["uk"]') : (isset($page->translations['meta_description']['uk']) ? $page->translations['meta_description']['uk'] : "");
    }else {
        $desc =  old('meta_description["uk"]');
    }

@endphp
<h5>Мета_теги <small>(необязательно для заполнения)</small></h5>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Meta_title</label>
            <input type="text" name="meta_title[uk]" class="form-control"
                   @isset($page)
                   value="{{ old('meta_title["uk"]') ? old('meta_title["uk"]') : (isset($page->translations['meta_title']['uk']) ? $page->translations['meta_title']['uk'] : "")}}"
                   @else
                   value="{{ old('meta_title["uk"]') }}"
                    @endisset
            >
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>Meta_description</label>
            <textarea name="meta_description[uk]" class="form-control" rows="4">{{ $desc }}</textarea>
        </div>
    </div>
</div>