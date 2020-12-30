<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Topic;
use App\Utils\UrlConverter;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $date = date('Y-m-d H:i:s');
    $topic = Topic::find(1);
    $urlpost = "La poderosa flexibilidad de PHP";
    $con =<<<CODE
      Después de tanto tiempo de posponerlo y vencer algunos miedos de no poder escribir algo que realemente  interesará a la audiencia que suele leer sobre estos temas, he decidido publicar este mi primer post. Y bueno antes de aburrirte entremos en materia.
No recuerdo muchas partes donde haya leído de la enorme y poderosa flexibilidad que ofrece php, y bueno creo que este es un excelente tema introductorio, así que dejemos que unas pocas líneas de código hablen por si mismas
--pre--
Si vemos esta clase escrita en php vemos que contiene un solo atributo y que ese mismo atributo esta tratado en una sola función, como diría yo, en directo podrías crear un objeto de esta entidad y asignarle en alguna otra parte de tus scripts su propiedad name sin mayores problemas y no sería necesario escribir más código que sí resulta necesario en lenguajes tipeados como Java o C++; que por cierto son lenguajes poderosísimos, pero no te ofrecen tal flexibidad porque son lenguajes  que se rigen por reglas muy estrictas. Ve el código de ejemplo a continuación
--pre--
Si apenas empiezas a estudiar lenguajes como python o javascript, y te atrae además la programación web, te convendrá llevarlos de la mano con php porque contienen elementos varios que son muy similares en la sintaxis y en la forma en que esa sintaxis te ayudará a resolver con pocas líneas de código, un problema dado.
Para tratar de convencerte un poco más, ve la forma en que puedes recorrer un array sin el aveces tedioso for tradicional con sus tres sentencias forzosas, -y es que muchas veces ni las necesitas-, checalo tu mismo:
--pre--
Si observas el segundo foreach es muy similar a un for tradicional, pero este en su función, te permite también extraer el nombre de la llave de cada elemento del array, cosa que soló podrías hacer con otros lenguajes, con objetos especializados como un HasMap de Java. Así que desde aquí, php ya esta dotando de un polimorfismo excepcional a un simple array sin escribir tantas líneas de código.
Continua leyendo los sguientes posts y te daré más elementos que te dejarán convencido de que php debe estar entre tus lenguajes de tu repertorio de developer.
CODE;
    $url = new UrlConverter();
    return [
        'titulo' => $urlpost,
        'contenido' => $con,
        'urlpost'=> $url->convertTitleToUrl($urlpost),
        'topic_id'=>1,
    ];
});
