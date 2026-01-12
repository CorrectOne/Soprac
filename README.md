
# SOPRAC – Sistema de Gestão Integrada para ONG de Proteção Animal

## 📌 Visão Geral
Este repositório contém o desenvolvimento do **MVP (Produto Mínimo Viável)** de uma plataforma web criada para apoiar a **SOPRAC – Sociedade Protetora dos Animais de Caieiras**.

O sistema tem como objetivo promover a **transformação digital** da ONG, substituindo controles manuais (planilhas e documentos físicos) por uma solução centralizada, segura e acessível para o gerenciamento de informações sobre animais resgatados, histórico médico, vacinação, eventos e processo de adoção.

---

## 🎯 Objetivo do Projeto
Desenvolver uma plataforma web que permita:

- Centralizar informações de animais resgatados  
- Reduzir a perda de dados físicos e digitais  
- Apoiar o processo de adoção responsável  
- Melhorar a organização administrativa da ONG  
- Facilitar o acesso às informações por administradores  

Este projeto foi desenvolvido como **trabalho acadêmico** no curso de **Desenvolvimento de Software Multiplataforma – FATEC Franco da Rocha**.

---

## 🧠 Contexto do Problema
Atualmente, a SOPRAC realiza o controle das informações utilizando **planilhas em Excel** e **documentos impressos**, o que tem ocasionado:

- Perda de dados
- Centralização da informação em apenas um computador
- Dificuldade de acesso pelos membros da equipe
- Falhas no acompanhamento de adoções e históricos médicos

A plataforma proposta surge como solução para esses problemas, promovendo **organização, acessibilidade e confiabilidade dos dados**.

---

## 🛠️ Tecnologias Utilizadas
### Front-end
- **HTML5**
- **CSS3**
- **JavaScript**

### Back-end
- **PHP**

### Banco de Dados
- **MySQL**
- **SQL**

### Ferramentas
- Git e GitHub  
- XAMPP  
- Visual Studio Code  
- MySQL Workbench  
- Bizagi Modeler  
- Draw.io  

---

## 🧩 Funcionalidades Implementadas (MVP)
### Área Pública
- Página institucional da ONG
- Catálogo de animais disponíveis para adoção
- Divulgação de eventos
- Informações sobre como ajudar a ONG
- Meios de contato e doação

### Área Administrativa
- Login de administradores
- Cadastro e gerenciamento de:
  - Animais
  - Vacinas
  - Doenças
  - Eventos
- Controle de status do animal:
  - Na ONG
  - Adotado
  - Transferido
  - Falecido
- Registro de histórico de vacinação

---

## 🚧 Funcionalidades Planejadas
- Formulário digital de **Questionário de Adoção e Responsabilidade**
- Fluxo completo de adoção online
- Validação e acompanhamento pós-adoção
- Melhorias de usabilidade e segurança
- Testes com usuários finais da ONG

---

## 🗂️ Estrutura do Projeto
```

Soprac/
├── controller/
├── model/
├── view/
├── css/
├── js/
├── sql/
├── index.php
└── README.md

````

---

## 🚀 Como Executar o Projeto
1. Clone o repositório:
   ```bash
   git clone https://github.com/CorrectOne/Soprac.git
````

2. Instale um servidor local (XAMPP, WAMP ou Laragon)

3. Importe o banco de dados localizado em:

   ```
   /sql/
   ```

4. Configure a conexão com o banco no arquivo PHP correspondente

5. Acesse no navegador:

   ```
   http://localhost/Soprac
   ```

---

## 🔐 Segurança

* Acesso administrativo protegido por login
* Planejamento de criptografia de dados sensíveis
* Adequação à **LGPD** prevista para fases futuras
* Backup periódico planejado

---

## 🌱 Impacto Social

O projeto está alinhado aos **Objetivos de Desenvolvimento Sustentável (ODS)** da ONU:

* **ODS 15 – Vida Terrestre**
* **ODS 17 – Parcerias e Meios de Implementação**

Contribuindo diretamente para o bem-estar animal, adoção responsável e fortalecimento de organizações do terceiro setor.

---

## 📚 Status do Projeto

📌 **Em desenvolvimento – MVP funcional**

Este repositório representa a **segunda fase do sistema**, servindo como base para evoluções futuras.

```
