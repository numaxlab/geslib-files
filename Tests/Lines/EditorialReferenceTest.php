<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\EditorialReference;
use PHPUnit\Framework\TestCase;

class EditorialReferenceTest extends TestCase
{
    public function testFromLine()
    {
        $editorialReference = EditorialReference::fromLine([
            '6E', '34326', '1', 'La presente historial social del vino estudia, desde un punto de vista comparativo, el proceso de modernización y el desarrollo de las políticas de intereses en la vitivinicultura española a partir de los ejemplos de la Rioja, Navarra y Cataluña, desde sus inicios en la década de 1860<BR>	hasta finales de los años 1930, es decir, hasta la Segunda República y la Guerra Civil. El estudio representa un intento de combinar distintos planteamientos históricos, desde la historia social y económica, pasando por la historia política, hasta la empresarial, la agraria y la historia de la técnica, todo ello para ofrecer un concepto integrado de historia social (o «historia de la sociedad») de un determinado sector agrícola crecientemente diferenciado y agroindustrial (con fuertes componentes comerciales), de sus actores y grupos y redes sociales, con sus estrategias de desarrollo y sus mundos vitales («Lebenswelten»). El objeto de nuestro estudio es el desarrollo de uno de los sectores clave de la modernización española: la formación de una industria vitivinícola especializada que acabó contando con vinos y cavas de calidad como productos tractores, y con una extensa producción de vinos en masa, más estandarizada y regulada, como base económica.<BR>	<BR>	Analizaremos dichos procesos recurriendo a los dos casos pioneros de la periferia norte y noreste de España, la Rioja (con Navarra como punto de contraste) y Cataluña, regiones que, como es sabido, exhibieron un desarrollo temprano.'
        ]);

        $this->assertEquals('34326', $editorialReference->articleId());
        $this->assertEquals(1, $editorialReference->count());
        $this->assertIsString($editorialReference->value());
    }
}
