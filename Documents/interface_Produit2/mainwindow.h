#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <produit.h>
QT_BEGIN_NAMESPACE
namespace Ui { class MainWindow; }
QT_END_NAMESPACE

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    MainWindow(QWidget *parent = nullptr);
    ~MainWindow();

private slots:
    void on_pb_valider_clicked();

    void on_bouton_supprimer_clicked();

    void on_pb_quitter_clicked();

    void on_pb_quitter_aff_clicked();

    void on_choix_modification_activated(int index);

    void on_Load_List_ID_clicked();

    void on_Confirmer_clicked();

    void on_bouton_modifier_clicked();

private:
    Ui::MainWindow *ui;
    Produit P ;
};
#endif // MAINWINDOW_H
