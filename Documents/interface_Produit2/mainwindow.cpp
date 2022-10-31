#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "produit.h"
#include <QMessageBox>
#include <QIntValidator>

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);
 ui->le_id->setValidator( new QIntValidator(0, 9999999, this));
 ui->tab_produit_affcihage->setModel(P.afficher());
}

MainWindow::~MainWindow()
{
    delete ui;
}


void MainWindow::on_pb_valider_clicked()
{
    int id=ui->le_id->text().toInt();
       QString categorie =ui->le_categorie->text();
       double prix=ui->le_prix->text().toDouble() ;
               int qtt_dispo = ui->le_qtt->text().toInt() ;
 Produit P(id,qtt_dispo , prix, categorie);
 bool test=P.ajouter();

 if(test)
 {
     ui->tab_produit_affcihage->setModel(P.afficher());

QMessageBox::information(nullptr,QObject::tr("ok"),
                         QObject::tr("Ajout effectué\n""Click Cancel to exit ."), QMessageBox::Cancel);
}
 else
 {
QMessageBox::critical(nullptr,QObject::tr("Not OK"), QObject::tr("Ajout non effectué.\n""Click Cancel to exit"), QMessageBox::Cancel);
 }
}


void MainWindow::on_bouton_supprimer_clicked()
{
    Produit P1 ;
    P1.setid(ui->supp_id->text().toInt());
    bool test=P1.supprimer(P1.getid());

    if(test)
    {
        ui->tab_produit_affcihage->setModel(P.afficher());

   QMessageBox::information(nullptr,QObject::tr("ok"),
                            QObject::tr("Suppression effectué\n""Click Cancel to exit ."), QMessageBox::Cancel);
   }
    else
    {
   QMessageBox::critical(nullptr,QObject::tr("Not OK"), QObject::tr("Suppression non effectué.\n""Click Cancel to exit"), QMessageBox::Cancel);
    }
}

void MainWindow::on_pb_quitter_clicked()
{
    QApplication::quit();
}

void MainWindow::on_pb_quitter_aff_clicked()
{
     QApplication::quit();
}



/*void MainWindow::on_Load_List_ID_clicked()
{
    QSqlQueryModel * model =new QSqlQueryModel() ;
    ui->Load_List_ID->

}

void MainWindow::on_Confirmer_clicked()
{
    int id=ui->aff_id->text().toInt();
}
*/

void MainWindow::on_bouton_modifier_clicked()
{
   int id=ui->id_mod->text().toInt();
 int new_id=ui->new_id->text().toInt();
      double new_prix=ui->new_prix->text().toDouble() ;

      Produit P;
      P.setid(new_id) ;
      P.setprix(new_prix);

      bool test=P.modifier();

      if(test)
      {
         ui->tab_produit_affcihage->setModel(P.afficher());
          QMessageBox::information(nullptr, QObject::tr("OK"),
                      QObject::tr("Modification effectuée.\n"
                                  "Click Cancel to exit."), QMessageBox::Cancel);
      }
      else
      {
          QMessageBox::critical(nullptr, QObject::tr("not OK"),
                      QObject::tr("Modification non effectuée.\n"
                                  "Click Cancel to exit."), QMessageBox::Cancel);
      }

}
