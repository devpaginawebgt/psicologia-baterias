<div class="w-full p-3 bg-zinc-800 rounded-sm">
    <audio controls class="w-full">
        <source src="{{ route('materials.show', ['filename' => $filename]) }}" type="audio/mp4">
        Tu navegador no soporta el elemento de audio.
    </audio>
</div>