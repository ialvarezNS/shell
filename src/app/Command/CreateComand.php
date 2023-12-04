<?php


$className = $argv[1] ?? null;

if ($className) {
    $template = "<?php\n\nnamespace App\\Command;\n\nclass $className extends \\App\\Shell\\AppShell {\n    public function execute(array \$arguments) {\n $className\n }\n}\n";

    $fileName = __DIR__ . "/app/Command/{$className}.php";

    if (!file_exists($fileName)) {
        file_put_contents($fileName, $template);
        echo "Archivo '$className.php' creado con éxito.\n";

        $nsFile = __DIR__ . "/ns";
        $nsContent = "#!/bin/bash\n\nphp index.php \"\$@\"\n";
        file_put_contents($nsFile, $nsContent); // Crear el archivo 'ns'

        chmod($nsFile, 0755); // Otorgar permisos de ejecución al archivo 'ns'
        echo "Se ha creado el archivo 'ns' y se han otorgado los permisos de ejecución.\n";
    } else {
        echo "El archivo '$className.php' ya existe.\n";
    }
} else {
    echo "Usage: php create_command.php [NombreDeLaClase]\n";
}