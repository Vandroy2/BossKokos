@php
    if(isset($page)){
        $desc = old('meta_description["ru"]') ? old('meta_description["ru"]') : (isset($page->translations['meta_title']['ru']) ? $page->translations['meta_title']['ru'] : "");
    }else {
        $desc =  old('meta_description["ru"]');
    }

@endphp
<h5>Мета_теги <small>(необязательно для заполнения)</small></h5>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Meta_title</label>
            <input type="text" name="meta_title[ru]" class="form-control"
                   @isset($page)
                   value="{{ old('meta_title["ru"]') ? old('meta_title["ru"]') : (isset($page->translations['meta_title']['ru']) ? $page->translations['meta_title']['ru'] : "")}}"
                   @else
                   value="{{ old('meta_title["ru"]') }}"
                    @endisset
            >
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>Meta_description</label>
            <textarea name="meta_description[ru]" class="form-control" rows="4">{{ $desc }}</textarea>
        </div>
    </div>
</div>