<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\AuthorBiography;
use PHPUnit\Framework\TestCase;

class AuthorBiographyTest extends TestCase
{
    public function testFromLine()
    {
        $authorBiography = AuthorBiography::fromLine([
            'AUTBIO', '2', 'Clarice Lispector (Tchetchelnik, Ucrania, 1920-Río de Janeiro, 1977) sorprendió a la intelectualidad brasileña con la publicación en 1944 de su primer libro, Cerca del corazón salvaje, en el que desarrollaba el tema del despertar de una adolescente, y por el que recibió el premio de la Fundación Graça Aranha 1945. Lo que entonces se consideró una joven promesa de tan sólo 19 años, se convirtió en una de las más singulares representantes de las letras brasileñas, a cuya renovación contribuyó con títulos tan significativos como La hora de la estrella, Aprendizaje o el libro de los placeres o su obra póstuma Un soplo de vida, todos ellos publicados en Siruela.'
        ]);

        $this->assertEquals('2', $authorBiography->authorId());
        $this->assertIsString($authorBiography->biography());
    }
}
