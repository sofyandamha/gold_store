<x-filament-widgets::widget>
    <x-filament::section>
    <h1>{{ $this->getTitle() }}</h1>
    <br/>
    <div id="div_widget"      
    x-data="{}"
    x-init="() => {
        const script = document.createElement('script');
        script.src = '{{ url('https://harga-emas.org/widget/widget.js') }}';
        document.head.appendChild(script);
        v_widget_type='current_gold_price';
        v_width=300;
        v_height=215;
        he_org_show(v_widget_type,v_width,v_height,'div_widget');}">  
        </div>

    <!-- ... -->
</div>
    </x-filament::section>
</x-filament-widgets::widget>
