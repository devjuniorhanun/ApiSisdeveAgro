import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:validatorless/validatorless.dart';

import '../../core/ui/widgets/sisdeve_button.dart';
import '../../core/ui/widgets/sisdeve_textformfield.dart';

class LoginPage extends StatelessWidget {
  const LoginPage({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Login Page'),
      ),
      backgroundColor: Colors.white,
      body: LayoutBuilder(
        builder: (_, constraints) {
          return ConstrainedBox(
            constraints: BoxConstraints(
              minHeight: constraints.maxHeight,
            ),
            child: IntrinsicHeight(
              child: Form(
                child: Padding(
                  padding: const EdgeInsets.all(20.0),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Text(
                        'Login',
                        style: context.textTheme.headline6?.copyWith(
                            fontWeight: FontWeight.bold,
                            color: context.theme.primaryColorDark),
                      ),
                      const SizedBox(
                        height: 30,
                      ),
                      SisdeveTextformfield(
                        label: 'E-mail.:',
                        largura: 70.0,
                        // controller: _emailEC,
                        validator: Validatorless.multiple([
                          Validatorless.required('E-mail obrigatório'),
                          Validatorless.email('E-mail inválido'),
                        ]),
                      ),
                      const SizedBox(
                        height: 30,
                      ),
                      SisdeveTextformfield(
                        label: 'Senha.:',
                        largura: 70.0,
                        obscureText: true,
                        //controller: _passwordEC,
                        validator: Validatorless.multiple([
                          Validatorless.required('Senha obrigatório'),
                          Validatorless.min(
                              6, 'Senha deve conter pelo menos 6 caracteres'),
                        ]),
                      ),
                      const SizedBox(
                        height: 50,
                      ),
                      Center(
                        child: SisdeveButton(
                          width: context.widthTransformer(reducedBy: 70),
                          label: 'ENTRAR',
                          onPressed: () {
                            /*
                              final formValid =
                                  _formKey.currentState?.validate() ?? false;
                              if (formValid) {
                                controller.login(
                                  email: _emailEC.text,
                                  password: _passwordEC.text,
                                );
                              }
                            */
                          },
                        ),
                      ),
                    ],
                  ),
                ),
              ),
            ),
          );
        },
      ),
    );
  }
}
