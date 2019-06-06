<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\BookshopReference;
use PHPUnit\Framework\TestCase;

class BookshopReferenceTest extends TestCase
{
    public function testFromLine()
    {
        $bookshopReference = BookshopReference::fromLine([
            '6', '11', '1', 'Theo ANGELOPOULOS Grecia · Francia · Italia, 1988<BR>Topio stin omichli <BR><BR>Duración: 120 min. <BR>Idiomas: Griego <BR>Subtítulos: Castellano <BR>DVD: 1 x DVD9 <BR>Zona: 2 <BR>Imagen: 1.33:1 <BR>Pantalla: 4:3 <BR>Sonido: Mono 2.0 / Dolby Digital (AC3) <BR><BR><BR>Dos niños griegos en busca de un padre hipotético, inician una fuga hacia Alemania. Toman un tren y reencuentran, en el transcurso de su iniciático viaje, el bien y el mal, la verdad y la mentira, el amor y la muerte, el silencio y el verbo. <BR>Theo Angelopoulos <BR><BR><BR>Contenido: Película · Escenas · "El trabajo con Eleni Karaindrou, y Tonino Guerra" por Theo Angelopoulos · Biografía de Theo Angelopoulos · Filmografía y Bibliografía de Theo Angelopoulos · Ficha técnica y artística · Texto introductorio de Santiago Fillol.'
        ]);

        $this->assertEquals('11', $bookshopReference->articleId());
        $this->assertEquals(1, $bookshopReference->count());
        $this->assertIsString($bookshopReference->value());
    }
}
