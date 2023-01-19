import 'package:flutter/material.dart';
import 'package:flutter_localizations/flutter_localizations.dart';
import 'package:get/get.dart';
import 'package:intl/intl.dart';

import 'src/core/bindings/application_binding.dart';
import 'src/infra/routes/pages.dart';
import 'src/infra/routes/routes.dart';

void main() {
  Intl.defaultLocale = 'pt_BR';
  runApp(GetMaterialApp(
    debugShowCheckedModeBanner: false,
    title: 'Sisdeve Delivery',
    initialRoute: Routes.LOGIN,
    defaultTransition: Transition.fade,
    initialBinding: ApplicationBinding(),
    getPages: AppPages.pages,
    localizationsDelegates: const [
      GlobalMaterialLocalizations.delegate,
      GlobalWidgetsLocalizations.delegate,
      GlobalCupertinoLocalizations.delegate,
    ],
    locale: const Locale('pt', 'BR'),
    supportedLocales: const [Locale('pt', 'BR')],
  ));
}
