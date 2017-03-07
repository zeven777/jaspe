<?php

use Nob\Admin\Seeder\NobSeeder;

class AboutTableSeeder extends NobSeeder
{
    public function run()
    {
        $titles = [
            'Nosotros' => '<p>Hacemos lo que amamos brindándote una línea completa de productos de limpieza, esponjas de cocina, fibras, metales, guantes, paños, cuidado personal y más.</p>
<p>Toda nuestra línea está desarrollada desde la primera idea con amor, cuidando nuestros procesos sin desperdiciar nada para preservar el medioambiente.</p>
<p>Como muchos otros productores nos preocupa el medioambiente y luchamos para que las prácticas utilizadas sean las mejores.</p>',
            'La Fábrica' => '<p>Jaspe cuida el medioambiente y alentamos a más empresas a unirse a cuidar de nuestro planeta, juntos.<br />Elegimos proteger la capa de Ozono y por eso nos han reconocido Dinama y Latu con el sello de Ozono Amigo.<br />Estamos siempre perfeccionando nuestros productos para brindarte lo que estás necesitando hoy. Exportamos a más de 5 países y seguimos buscando fronteras para conquistar.</p>',
            'Misión' => '<p>Somos una empresa que lidera su mercado creando un mix de productos para la limpieza del hogar y el cuidado personal, que se distinguen y reconocen por su calidad, presentación y utilidad.</p>',
            'Visión' => '<p>Ser la fábrica de esponjas multilatina de mayor presencia en América, líderes en nuevos productos como consecuencia de investigación y desarrollo, satisfaciendo las necesidades de nuestros clientes. Ser una organización referente de un camino posible de compromiso, acción y resultados y dejar como legado un medioambiente saludable para las próximas generaciones, siendo reconocidos como una empresa "verde".</p>',
        ];

        Session::put('translate_language','es');

        foreach( $titles as $title => $content )
        {
            Empresa::createRow([
                'titulo'    => $title,
                'contenido' => $content,
                'status'    => 'active'
            ]);
        }
    }
}