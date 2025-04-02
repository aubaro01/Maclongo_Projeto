function mostrarPolitica() {
    Swal.fire({
        title: 'Política de Privacidade',
        html: `
            <p>A nossa Política de Privacidade explica como suas informações são coletadas, usadas e protegidas.</p>
            <p><strong>1. Coleta de Dados:</strong> Informações como nome, e-mail e dados de compras.</p>
            <p><strong>2. Uso dos Dados:</strong> Melhoramos nossos serviços usando suas informações.</p>
            <p><strong>3. Proteção:</strong> Seus dados são protegidos com segurança.</p>
        `,
        icon: 'info',
        confirmButtonText: 'Fechar',
    });
}
