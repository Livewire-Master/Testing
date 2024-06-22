<div>
    <h1>Fruit Card Project V{{ $version }}</h1>
    <p>Livewire is fun...!</p>
    <hr>
    <h2>Cards:</h2>
    <p>
        u have {{ count($fruits) }} fruit card:
    </p>
    <ol>
        <li>
            <livewire:fruit.apple/>
        </li>
    </ol>
</div>
