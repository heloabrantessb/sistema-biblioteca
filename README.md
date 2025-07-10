# BibliONteca
Projeto Desenvolvido como trabalho semestral da disciplina 
**Desenvolvimento Web II** do curso de Análise e Desenvolvimento de sistemas.
## Sobre o Projeto
A bibli**ON**teca é um sistema de gerenciamento bibliotecário. O objetivo do projeto foi
## Funcionalidades
 ### Autenticação
 - Cadastro e login de usuários comuns através do usuario `bibliotecario`
 - Controle de acesso baseado em função: `administrador`, `bibliotecario`, `usuario`. 
### Comprovante
- Gera um comprovante ao devolver o livro com informações sobre o empréstimo.

### Dashboard de usuário comum
- Gera um histórico de empréstimos.
- Contém um botão de pesquisa de livros

### Gerais
- Faz o CRUD de gênero literário, categoria, livros e empréstimos
## Tecnologias Utilizadas
- Laravel com blade
- phpMyAdmin (Via Xampp)
- Apache (Via Xampp)
- Tailwind CSS 
- Dompdf (geração de pdf)
- Breeze (Autenticação)